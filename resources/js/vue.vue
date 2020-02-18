<script>
    /*
    1.1. To write a short overview of the SendGrid API - The sendGrid API is a email
    service API, integrating into your app allows you to focus on emailing logic and
    email content instead of spending more time on configuring your own email
    infrastructure. It's pretty much composing and email on an webmail but in code
    only. An easy usage of this API is sending email confirmation to registering
    users, it also works great with Mail Merge, freeing you up from the task of
    composing email by code by relying on available templates and just insert data
    on the placeholders, also Zero bounce is also good with sendGrid by ensuring
    email validity.
    */ /*1.2. To write your best version of selected Stackoverflow
    answers
    - Different between $mount() and el-

    */

    // A vue instance without $el, only a var called "vm" which references the Vue instance
    var vm = new Vue({
        template: '<div>I\'m mounted</div>'
        });

    /*
    The el option declares the ID of the created Vue class/instance, this Vue instance is instantiated
    but not rendered yet in the DOM, when $el is omitted, this instance is basically
    nameless, you can't mount this instance to the DOM like you would normally do
    using an ID so you need a way to reference the instance and you may use a regular variable for that.
    */

    /*
    One way to mount this vue instance to the DOM by calling the $mount() function. 
    $mount() is a function that can be used by any vue instance, you should also have a variable that contains or 
    references the vue instance as its only identifier. 
    Without a variable, you will have to resort to import and export the file where the vue instance resides. 
    */

    vm.$mount('#app');

    /*
    In the code above, we are ordering the vue instance called "vm" to $mount vm's template to the DOM
    on the DOM element that has the ID '#app'. 
    $mount() expects a string and you may put a DOM element like a <div> or selector like a class or ID.
    The element must exist before you $mount the instance,
    */

    // ID called 'app' already exists
    <html>
        <body>
            <button type="button" onclick="mountVueInstance()">Attach the vue instance</button> //
            <div id="#app"></div>
        </body>
    </html>

    <script> 
    var vm = new Vue({
        template: '<div>I\'m mounted</div>'
        });

    function mountVueInstance() {
        vm.$mount('#app'); // Here we simple called $mount as the '#app' already exists in the DOM
        }
    </script>

    /*
    Dynamiclly, you may create any HTML element and attached an ID to the element yourself 
    through a function which you may trigger in any way you want...
    */

    <html>
        <body>
            <div onclick="createElement">CREATE THE ELEMENT</div>
        </body>
    </html>

    <script>
var vm = new Vue({
  template: "<div>I'm mounted</div>"
});

function createElement() {
  // creates an opening <div> and it's closing </div>
  var my_HTML_Element = document.createElement("div");

  // let's attach an ID called 'app' to created <div>
  my_HTML_Element.id = "app";

  //Finally insert <div id='app'> to the body
  document.body.appendChild(my_HTML_Element);

  //Now that the element with the ID exist in the DOM, we can finally append our vue instance to the DOM
  vm.$mount("#app");
}
</script>

    /*
    In essence, $mount() helps vue instances without $el option to be mounted to be rendered. 
    */

   $mount() can also be used to render/prepare the vue instance without attaching it to the DOM by not specifying 
   an element or selector

   var vueInstance = vm.$mount() /*Notice here that the selector or element is missing, therefore, 
   we have no entry point for our instance*/

    
Q1

 <Todos v-bind:todos="todos" />

 /*
 This <Todos/> child component receives the "todos" variable from the parent component as a prop coincidentally called
 'todos'. 

The vue directive v-bind's role is to ensure reactivity and keep the child's todos props value in synchwith the  
parent's todos property value. Therefore as soon as the parent's data changes, it will automatically change the 
value of the child component prop.
*/

// A child component without v-bind
<Todos todos="todos" />

/*
Without the v-bind, child component will only inherit the parent's todos value at that time of creation of the 
child component which is ... */

let todo = [
  {
    name: "Rohit",
    title: "Full Stack Developer"
  },
  {
    name: "Varun",
    title: "head of marketing"
  },
];

/*
Say there's an update from the database and the app queries new todos...
*/ 

let todo = [
  {
    name: "data has changed",
    title: "and updates were received"
  },
  {
    name: "by the client",
    title: "how to display the new data?"
  },
]; 

/* and an event triggers a function to push this new data to the parent component so 
this will change and the parent component's data() but because there is no v-bind in the props
child component, the child's props will never be updated unless you manually make a function to update the child 
components data. v-bind saves us the hassle of having to do that, therefore, v-bind provides "REAL-TIME REACTIVITY" 
between binded variables, usually parent-to-child relations.

Additionally, component variables or properties can be passed inside double quotes inside the 
HTML/custom-HTML/component tags <>. Anything inside the double quotes will be treated as pure javascript and the values
will be received by the child's props or attribute.*/

/* and the todos props ==== 2, you can be verbose here and pass even objects or arrays as long as they are double quoted
but that is not advisable in keeping your code readable*/
<Todos v-bind:todos="1 + 1" /> 

// Moving on to v-for

<template>
  <div v-bind:key="todo.id" v-for="todo in todos">
    <h3>{{todo.title}}</h3>
  </div>
</template>

<script>
export default {
  name: "Todos",
  props: ["todos"]
};
</script>

/* This is basically saying "for every 'todo' in 'todos' ... create an '<h3>' with the 'todo's title' as h3's innerHTML".
/* This is basically doing a for/in loop*/  for(let an_item in object)

/* The v-bind:key="Provide_an_objects.uniqueKey" is also necessary whenever doing a v-for loop, 
it's a complicated topic but all you have to do is provide a unique key, this helps vue optimize 
it's performance for v-for loops by keeping track attaching the key as the DOM node's identity for 
reusing and reordering elements.
*/

Q2.


// Arrays is the basic for declaring props
props: ["todos"] 

/* but if you want to specify the allowed or list of allowed values for your props, you will have to resort to 
object syntax, declaring props with type checking throws an error in the console when the wrong value is passed
*/

// List of possible type checking
props: {
    msg: String,
    likes: Number,
    expired: Boolean,
    commented_by_id: Array,
    commenters_details: Object,
    callback: Function,
    axios: Promise
    }

Q3

Like the explanation in Q1 about v-bind, the value of whatever is in the double quotes will be passed 
as the node key of the DOM element being rendered. 

//What is the difference between the views and components folders in a Vue project?

/*
Both folder still contain the same vue components, the only difference is views folder is mainly used to contain all  
page-level view components or rather all parent component and each parent component contains all the child-components
necessary for that particular page, while the components folder is simply for smaller components that will be 
used inside a parent component in views folder.

Usually, a parent component in views folder is imported and registered and will be rendered for a specific route
in the vue-router.
*/

import loginView from './views/loginComponent.vue'; // <<< importing the page-level components for Login page
import registerView from './views/registerComponent.vue'; // <<< importing the page-level components for Register page

const router = new vueRouter({ // <<< the vue-router 
    routes: [ // <<< this array of objects that contains all registered routes and their associated page-level components
        { 
          path: '/login', // when the URL turns into "/login"
          component: loginView // the loginView component is rendered along with its child components housed in the 'components' folder
        },
        { 
          path: '/register', // another path
          component: registerView // another page-level component
        }
    ]
    })

/* 
This is a simple folder structure boilerplate and you may deviate from this that best fit your project's needs.
*/