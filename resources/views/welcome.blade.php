<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif
            <div id="programmer">
                <div :style="{color: colorx}">
                    <test v-on:change-color="colorx = $event.color"></test>
                    <h3>Enter your name</h3>
                    <input type="text" v-model="name">
                    <h3>Enter your job</h3>
                    <input type="text" v-model="job">

                    <button @click="jobs.push(job)">Add job</button>
                    <h1 v-if="jobs.length"> @{{final_text}}</h1>
                </div>
            </div>
        </div>
        

        <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
        <!-- <script src="{{ asset( 'js/app.js') }}"></script> -->
        <script>
            Vue.component('test',{
                data: function() {
                    return {
                        count: 0
                    }
                },
                template: `
                    <button v-on:click="$emit('change-color',{color:'green'})"> TEST </button>
                `
            })


            new Vue({
                el: "#programmer",
                data: {
                    name: '',
                    job: '',
                    jobs: [],
                    colorx: "blue"
                },
                computed: {
                    formatted: function() {
                        if(this.jobs.length === 2) {
                            return this.jobs.join(" & ") + "."
                        }
                        else if(this.jobs.length === 1) {
                            return this.jobs[0] + "."
                        }
                        else if(this.jobs.length === 0) {
                            return ""
                        }
                        else {
                            const jobsCopy = this.jobs
                            const lastItem = jobsCopy.pop()
                            const final = this.jobs.join(", ") + " & " + lastItem + "."
                            this.jobs.push(lastItem)

                            return final
                        }
                    },
                    final_text: function() {
                        return this.name + " is a " + this.formatted
                    }
                }
            })
        </script>
    </body>
    
</html>
