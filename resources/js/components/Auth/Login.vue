<template>
    <div class="h-screen flex flex-col space-y-10 justify-center items-center">
    <div class="bg-white w-96 shadow-xl rounded p-5">
        <h1 class="text-3xl font-medium">Login</h1>
        <div class="bg-orange-100 border-l-4 border-orange-500 text-orange-700 p-4" role="alert" v-if="alert">
            <p class="font-bold">Alert!</p>
            <p>{{ text }}</p>
        </div>
        <form class="space-y-5 mt-5">
        <input type="email" class="w-full h-12 border border-gray-800 rounded px-3" v-model="email" placeholder="Email" required/>
        <input type="password" class="w-full h-12 border border-gray-800 rounded px-3" v-model="password" placeholder="Password" required/>

            <router-link to='/register'>
                <a class="font-medium text-blue-900 rounded-md p-2">Register</a>
            </router-link>

        <button @click="login()" class="text-center w-full bg-blue-900 rounded-md text-white py-3 font-medium">Login</button>
        </form>
    </div>
    </div>
</template>

<script>
export default {
data(){
  return{
    email:'',
    password:'',
    alert:false,
    text:null,
  }
},
methods:{
//login function api
login:function()
{
  axios.post('/api/login', {
    'email':this.email,
    'password':this.password,
  }).then(res => {
  localStorage.setItem('token',res.data.token);
  localStorage.setItem('loggedIn',true);
  //routing to admin panel
  this.$router.push('/dashboard').then(
    res => console.log('logged in')
  ).catch(
    err => console.warn(err)
  );
  })
  .catch(err =>{
    this.alert = true;
    this.text = err.response.data.status;
  });
}
}     
}
</script>
