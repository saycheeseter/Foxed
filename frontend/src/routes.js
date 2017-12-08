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
import Forum from './views/forums.vue'
import ForumCategory from './views/forum-topics.vue'
import sampleThread from './views/sample-thread.vue'
import createThread from './views/create-thread.vue'
import CreateCategory from './views/create-category.vue'
import Home from './views/home.vue'
import MyThread from './views/myThread.vue'
import Welcome from './views/welcome.vue'


Vue.use(VueRouter)
window.axios = require('axios');
const router = new VueRouter({
    routes: [{
            path: "/login",
            component: Welcome,
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
        // {
        //     path: "/community/create",
        //     component: createThread,
        //     meta: {
        //         forAuth: true
        //     }
        // },
        {

            path: "/community",
            component: Forum,
            meta: {
                forAuth: false
            }
        },
        {

            path: "/community/create",
            component: CreateCategory,
            meta: {
                forAuth: true
            }
        },

        {

            path: "/community/:slug",
            component: ForumCategory,
            meta: {
                forAuth: false
            }
        },
        {

            path: "/community/:slug/create",
            component: createThread,
            meta: {
                forAuth: true
            }
        },

        {
            path: '/community/:slug/:id',
            component: sampleThread,
            meta: {
                forAuth: false
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
            path: "/:name/works",
            component: Profile,
            meta: {
                forAuth: true
            }
        },
        {
            path: "/:name/threads",
            component: MyThread,
            meta: {
                forAuth: true
            }
        },
        {
            path: "/class/:id",
            component: Class,
            meta: {
                forAuth: true
            }
        },
        {
            path: "/:name/editor",
            component: Editor,
            meta: {
                forAuth: true
            }
        },
        {
            path: "/:id/editor",
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
        },
        {
            path: "/",
            component: Home,
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