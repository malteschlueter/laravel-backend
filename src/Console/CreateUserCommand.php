<?php

namespace Mschlueter\Backend\Console;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Validator;
use Mschlueter\Backend\Models\User;
use Mschlueter\Backend\Notifications\UserCreated;
use Symfony\Component\Console\Input\InputOption;

class CreateUserCommand extends Command {

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'backend:create-user';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Creates a new backend user.';

    /**
     * @var array
     */
    protected $user = [];

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct() {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle() {

        $this->askEmailAddress();

        $this->askName();

        $password = str_random();

        $this->user['password'] = bcrypt($password);

        $this->user['active'] = true;

        $user = User::create($this->user);

        $user->notify(new UserCreated($password));

        $this->info('New user created. The password was send via email.');
    }

    protected function askEmailAddress() {

        do {

            $this->user['email'] = $this->ask('Please type in a email address.');

            /* @var \Illuminate\Validation\Validator $validator */
            $validator = Validator::make($this->user, [
                'email' => 'required|string|email|max:255|unique:backend_users',
            ]);

            if($validator->passes() !== true) {

                $errors = $validator->errors()->all();

                foreach($errors as $error) {

                    $this->alert($error);
                }
            }

        } while($validator->passes() !== true);
    }

    protected function askName() {

        do {

            $this->user['name'] = $this->ask('Please type in a name.');

            /* @var \Illuminate\Validation\Validator $validator */
            $validator = Validator::make($this->user, [
                'name' => 'required|string|max:255',
            ]);

            if($validator->passes() !== true) {

                $errors = $validator->errors()->all();

                foreach($errors as $error) {

                    $this->alert($error);
                }
            }

        } while($validator->passes() !== true);
    }
}
