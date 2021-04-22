<template>
    <div>
    <Navbar />
    <div class="container mx-auto" style="padding-top:2%;">
    <div class="bg-white rounded p-5 text-center">
        <div class="flex flex-col">
            <div class="m-auto">
            <form class="space-y-5 mt-5" v-if="edit == true">
                <input type="text" class="w-full h-12 border border-gray-800 rounded px-3" v-model="todo" placeholder="Todo" required/>
                <button @click="editTodo()" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Edit Todo</button>
            </form>
            <form class="space-y-5 mt-5" v-else>
                <input type="text" class="w-full h-12 border border-gray-800 rounded px-3" v-model="todo" placeholder="Todo" required/>
                <button @click="addTodo()" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Add Todo</button>
            </form>
            </div>
        </div>
        <div class="flex flex-col">
            <div class="m-auto">
                <table class="table-auto">
                <thead>
                    <tr>
                    <th class="w-1/4 px-4 py-2">Name</th>
                    <th class="w-1/4 px-4 py-2">Actions</th>
                    </tr>
                </thead>
                <tbody v-for="todo in todos" :key="todo.id">
                    <tr>
                    <td class="border px-4 py-2">{{ todo.name }}</td>
                    <td class="border px-4 py-2">  
                    <div class="grid grid-rows-1 grid-cols-3 gap-4 p-1">
                        <div class="col-span-1">
                            <button @click="getTodo(todo.id)" class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded">
                                Edit
                            </button>
                        </div>
                    </div>
                    <div class="grid grid-rows-1 grid-cols-3 gap-4 p-1">
                        <div class="col-span-1">
                            <button @click="deleteTodo(todo.id)" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                                Delete
                            </button>
                        </div>
                    </div>
                    </td>
                    </tr>
                </tbody>
                </table>
            </div>
        </div>
    </div>
    </div>   
    </div>
</template>

<script>
import Navbar from '../Layouts/Navbar';

export default {
    components: {
      Navbar,
    },
    data: function () {
        return {
            todos:[],
            todo:"",
            edit:false,
            selected:"",
        }
    },
    mounted:function(){
      axios.get('/api/todos')
       .then(res => {
         this.todos = res.data.todos        
       })
    },
    methods: {
        getTodo(todo_id){
          axios.get(`/api/todos/${todo_id}`)
            .then(res => {
                this.selected = res.data.todo      
                this.todo = res.data.todo.name  
                this.edit = true
            })
        },
        deleteTodo(todo_id){
          axios.delete(`/api/todos/${todo_id}`)
            .then(res => {
                this.todos = res.data.todos        
            })
        },
        addTodo(){
        if(this.todo != ''){
          axios.post(`/api/todos/`,{
            name:this.todo
          })
            .then(res => {
                this.todo = '';
                this.todos = res.data.todos        
            })
        }
        },
        editTodo(){
        if(this.todo != ''){
          axios.put(`/api/todos/${this.selected.id}`,{
            name:this.todo
          })
            .then(res => {
                this.todo = '';
                this.edit = false
                this.selected = ''
                this.todos = res.data.todos        
            })
        }
        },
    },
}
</script>
