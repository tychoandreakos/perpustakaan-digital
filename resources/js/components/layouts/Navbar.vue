<template>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">Navbar</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                </li>

                <li class="nav-item">
                    <router-link 
                    v-for="item in items" 
                    :key="item.title" 
                    :to="item.to"
                    ><a v-if="item.show" class="nav-link">{{ item.title }}</a>
                    </router-link>
                </li>

            </ul>
        </div>
    </nav>
</template>

<script>
    export default {
        data() {
            return {
                items: [{
                        title: 'Login',
                        to: {name: 'login'},
                        show: !User.loggedIn()
                    },

                    {
                        title: 'Logout',
                        to: {name: 'logout'},
                        show: User.loggedIn()
                    },
                ]
            }
        },

        created() {
            EventBus.$on('logout', () => {
                User.logout();
            })
        }
    }

</script>
