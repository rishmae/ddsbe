<?php

    namespace App\Http\Controllers;
    use Illuminate\Http\Request;
    use App\Traits\ApiResponser;
    use App\User;
    use DB;
    Class UserController extends Controller {
        use ApiResponser;
        private $request;
    
    public function getUsers(){
		$users = app('db')->select("SELECT * FROM users");
		return $this->successResponse($users);    
		
	}

        public function __construct(Request $request){
        $this->request = $request;
        }

        public function login(){
            return view('login');
        }

        public function validateUser(){
            
            $username = $_POST['username'];
            $password = $_POST['password'];

            $user = app('db')->select("SELECT * FROM users WHERE username='$username' and password='$password'");

            if(empty($user)){
                return 'Invalid Username and Password';
            }else{
                return redirect()->route('dashboard');
            }
            
        }
        public function dashboard(){
            $id = app('db')->select("SELECT id FROM users");
            $username = app('db')->select("SELECT username FROM users");
            $password = app('db')->select("SELECT password FROM users");
            $lastname = app('db')->select("SELECT lastname FROM users");
            $firstname = app('db')->select("SELECT firstname FROM users");
            $data = [
                'id'=>$id,
                'username'=>$username,
                'password'=>$password,
                'lastname'=>$lastname,
                'firstname'=>$firstname
            ];
            return view('dashboard')->with($data);
        }
        public function createUser(Request $request){

            $this->validate($request, [
                'username' => 'required|max:50',
                'password' => 'required|max:50',
                'lastname' => 'required|max:50',
                'firstname' => 'required|max:50',
            ]);

            $users = app('db')->select("SELECT * FROM users");
            

            if(count($users)>0){
                $idcount = DB::table('users')->orderBy('id', 'DESC')->first();
                $idcount = $idcount->id;
                $user = new User;
                $user->id=($idcount+1);
                $user->password = $request->input('password');
                $user->username = $request->input('username');
                $user->lastname = $request->input('lastname');
                $user->firstname = $request->input('firstname');
                $user->timestamps = false;
                if ($user->save()) {
                    return redirect()->route('dashboard');
                } else {
                }
            }else{
                $user = new User;
                $user->id = (count($users)+ 1);
                $user->password = $request->input('password');
                $user->username = $request->input('username');
                $user->lastname = $request->input('lastname');
                $user->firstname = $request->input('firstname');
                $user->timestamps = false; //<-----it takes me three days para makabalo kani raman diay kulang haha
                if ($user->save()) {
                    return redirect()->route('dashboard');
                } else {
                }
            }
           
        }

        public function createPage(){
            return view('create');
        }

        public function editPage(){
            $id = app('db')->select("SELECT id FROM users");
            $username = app('db')->select("SELECT username FROM users");
            $password = app('db')->select("SELECT password FROM users");
            $lastname = app('db')->select("SELECT lastname FROM users");
            $firstname = app('db')->select("SELECT firstname FROM users");
            $data = [
                'id' => $id,
                'username' => $username,
                'password' => $password,
                'lastname' => $lastname,
                'firstname' => $firstname
            ];
            return view('edit')->with($data);
        }

        public function update(){
            $id = $_POST['idSearch'];
            $username = $_POST['username'];
            $password = $_POST['password'];
            $lastname = $_POST['lastname'];
            $firstname = $_POST['firstname'];
            app('db')->table('users')->where('id', $id)->update(['username' => $username, 'password' => $password,'lastname' => $lastname, 'firstname' => $firstname]);
            return redirect()->route('dashboard');
        }

        public function delete(){
            $id = $_POST['delete_id'];
            $user = User::find($id);
            $user->delete();
            return redirect()->route('dashboard');
        }

    }
?>