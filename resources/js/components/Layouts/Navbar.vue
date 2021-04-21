<template>
<nav class="navbar navbar-expand-md bg-dark navbar-dark">
  <!-- Brand -->
  <a class="navbar-brand" href="#"> Welcome</a>

  <!-- Navbar links -->
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link btn btn-danger" style="color:white;" @click="logout">Logout</a>
      </li>
    </ul>
</nav>
</template>

<script>
export default {
  data: () => ({
    drawer: null,
  }),
methods: {
logout:function()
    {
    localStorage.removeItem('token');
    //routing to login page
    this.$router.push('/login').then(res => {
        this.text = 'logged out!';
        this.snackbar = true;
    }).catch(
    err => console.warn(err)
    );       
    },
},
}
</script>
