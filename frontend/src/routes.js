import Vue from 'vue'
import VueRouter from 'vue-router'

import Login from './components/authentication/Login.vue'
import Register from './components/authentication/Register.vue'
import Feed from './components/Feed.vue'
import Profile from './components/Profile.vue'
import Editor from './components/editor/Editor.vue'
import EditEditor from './components/editor/CodeEdit.vue'
import Thread from './components/forum/Thread.vue'
import Create from './components/forum/Ask.vue'
import Edit from './components/forum/EditThread.vue'
import Class from './components/class-section/Classroom.vue'
import Evaluation from './components/class-section/Evaluation.vue'
import Forum from './views/forums.vue'
import ForumCategory from './views/forum-topics.vue'
import sampleThread from './views/sample-thread.vue'
import createThread from './views/create-thread.vue'
import Home from './views/home.vue'

Vue.use(VueRouter)
window.axios = require('axios');
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
            path: "/:name/codes",
            component: Profile,
            meta: {
                forAuth: true
            }
        },
        {
            path: "/works/:id/edit",
            component: EditEditor,
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