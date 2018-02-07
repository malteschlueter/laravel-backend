<?php

namespace Mschlueter\Backend\Console;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Validator;
use Mschlueter\Backend\Models\Role;
use Mschlueter\Backend\Models\User;
use Mschlueter\Backend\Notifications\UserCreated;

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

        $this->askName();

        $this->askEmailAddress();

        $this->askRole();

        $this->user['password'] = bcrypt(str_random());

        $user = User::create($this->user);

        $token = Password::broker()->createToken($user);

        $user->notify(new UserCreated($token));

        $this->info(trans('backend::console.user.create.response'));
    }

    protected function askName() {

        do {

            $this->user['name'] = $this->ask(trans('backend::console.user.create.ask.name'));

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

    protected function askRole() {

        $this->user['role'] = $this->choice(trans('backend::console.user.create.ask.role'), [
            Role::SUPER_ADMIN => 'Superadmin',
            Role::ADMIN => 'Admin',
            Role::USER => 'User',
        ]);
    }

    protected function askEmailAddress() {

        do {

            $this->user['email'] = $this->ask(trans('backend::console.user.create.ask.email'));

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
}
