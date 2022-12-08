
<template>
    <div class="m-auto w-2/5 justify-center justify-items-center content-center items-center">
        <div>
            <h1 class="text-xl">Todo List</h1>
            <div>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 mr-4 text-grey-darker" v-model="newTodo" @keyup.enter="add" placeholder="Add Todo">
                <button class="inline-block rounded-lg bg-indigo-600 px-4 py-1.5 text-base font-semibold leading-7 text-white shadow-sm ring-1 ring-indigo-600 hover:bg-indigo-700 hover:ring-indigo-700 cursor-pointer my-1" @click="add" :disabled="newTodo.length === 0">Add</button>
            </div>
        </div>
        <div>
            <div class="flex mb-4 items-center" v-for="(todo, index) in todos" :key="todo.id">
                <input type="checkbox" class="mr-2" @click="updateStatus(todo)">
                <p class="w-full text-xl" :class="todo.finished ? 'line-through text-green' : 'text-grey-darkest'">{{todo.text}}</p>
                <button class="mr-0.5 inline-block rounded-lg  bg-lime-600 px-4 py-1.5 text-base font-semibold leading-7 text-white shadow-sm ring-1 ring-indigo-600  hover:bg-lime-700" :class="todo.finished ? 'text-grey border-grey hover:bg-grey' : 'text-green border-green hover:bg-green'" @click="updateStatus(todo)" v-text="todo.finished ? 'Not Done' : 'Done'"></button>
                
                <button class="flex-no-shrink p-2 ml-2 border-2 rounded text-red border-red hover:text-white hover:bg-red" @click="remove(index)">Remove</button>
            </div>
        </div>
        <div v-show="todos.length === 0">
            <todo-item v-for="(todo, index) in todos" :key="todo.id" :todo="todo" :index="index"></todo-item>
            <p class="w-full text-center text-grey-dark">There are no todos</p>
        </div>
    </div>
</template>


<!-- Methods  -->
<script>
import axios from 'axios';
import todoItem from './todo-item.vue';
   export default{
        data(){
            return{
                todos: [],
                newTodo: '',
            }
        },
        created() {
          this.getTodos();
        },
        methods: {
            getTodos() {
              const t = this;
              axios.get('todos')
                  .then(({data}) => {
                    t.todos = data;
                  });
            },
            createTodo(text) {
                const t = this;
                axios.post('todos', {text: text, finished: false})
                    .then(({data}) => {
                        t.todos.unshift(data);
                    });
            },
            add() {
              const t = this;
              if(t.newTodo.length > 0) {
                  t.createTodo(t.newTodo);
                  t.newTodo = '';
                  t.baseId++;
              }
            },
            updateStatus(todo) {
              todo.finished = !todo.finished;
            },
            remove(index) {
              const t = this;
              t.todos.splice(index, 1);
            }
        },
        components: {
          todoItem
        }
    }
</script>

