<template>
    <div class="h-screen flex flex-col space-y-10 justify-center items-center">
    <div class="bg-white w-96 shadow-xl rounded p-5">
        <h1 class="text-3xl font-medium">Login</h1>
        
        <form class="space-y-5 mt-5">
        <input type="email" class="w-full h-12 border border-gray-800 rounded px-3" placeholder="Email" required/>
        <input type="password" class="w-full h-12 border border-gray-800 rounded px-3" placeholder="Password" required/>

            <router-link to='/register'>
                <a class="font-medium text-blue-900 rounded-md p-2">Register</a>
            </router-link>

        <button class="text-center w-full bg-blue-900 rounded-md text-white py-3 font-medium">Login</button>
        </form>
    </div>
    </div>
</template>

<script>
    export default {
        mounted() {

        }
    }
</script>
