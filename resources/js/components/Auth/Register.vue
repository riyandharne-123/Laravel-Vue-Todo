<template>
<div class="h-screen flex flex-col space-y-10 justify-center items-center">
  <div class="bg-white w-96 shadow-xl rounded p-5">
    <h1 class="text-3xl font-medium">Register</h1>
        <div class="bg-orange-100 border-l-4 border-orange-500 text-orange-700 p-4" role="alert" v-if="alert">
            <p class="font-bold">Alert!</p>
            <p>{{ text }}</p>
        </div>
    <form class="space-y-5 mt-5">
      <input type="text" class="w-full h-12 border border-gray-800 rounded px-3" v-model="name" placeholder="Name" required/>
      <input type="email" class="w-full h-12 border border-gray-800 rounded px-3" v-model="email" placeholder="Email" required/>
      <div class="w-full flex items-center border border-gray-800 rounded px-3">
        <input type="password" class="w-4/5 h-12" v-model="password" placeholder="Password" />
      </div>

        <router-link to='/login'>
            <a class="font-medium text-blue-900 rounded-md p-2">Login</a>
        </router-link>

      <button class="text-center w-full bg-blue-900 rounded-md text-white py-3 font-medium" @click="register()">Register</button>
    </form>
  </div>
</div>
</template>

<script>
export default {
data(){
  return{
    name:'',
    email:'',
    password:'',
    alert:false,
    text:null,
  }
},
methods:{
register:function()
{
  axios.post('/api/register', {
    'name':this.name,
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
