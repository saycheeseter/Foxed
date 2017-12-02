import Vue from 'vue'
import VueRouter from 'vue-router'

import Login from './components/authentication/Login.vue'
import Register from './components/authentication/Register.vue'
import Feed from './components/Feed.vue'
import Profile from './components/Profile.vue'
import Editor from './components/editor/Editor.vue'
import Thread from './components/forum/Thread.vue'
import Create from './components/forum/Ask.vue'
import Edit from './components/forum/EditThread.vue'
import Class from './components/class-section/Classroom.vue'
import Evaluation from './components/class-section/Evaluation.vue'
import Thread from './views/sample-thread.vue'
import createThread from './views/create-thread.vue'

Vue.use(VueRouter)

const router = new VueRouter({
    routes: [{
            path: "/login",
            component: Login,
            meta: {
                forVisitors: true
            }
        },
        {
            path: "/register",
            component: Register,
            meta: {
                forVisitors: true
            }
        },
        {
            path: "/feed",
            component: Feed,
            meta: {
                forAuth: true
            }
        },

        {
            path: "/replies",
            component: Thread,
            meta: {
                forAuth: true
            }
        },
        {
            path: "/feed/create",
            component: Create,
            meta: {
                forAuth: true
            }
        },
        {
            path: "/feed/:thread/edit",
            component: Edit,
            meta: {
                forAuth: true
            }
        },
        {
            path: "/profile",
            component: Profile,
            meta: {
                forAuth: true
            }
        },
        {
            path: "/class",
            component: Class,
            meta: {
                forAuth: true
            }
        },
        {
            path: "/editor",
            component: Editor,
            meta: {
                forAuth: true
            }
        },
        {
            path: "/evaluation",
            component: Evaluation,
            meta: {
                forAuth: true
            }
        }
    ],
    // linkActiveClass:'active' 
    // ^ for active classes

    // mode: 'history 
    // ^to remove the hashtag
})

export default router