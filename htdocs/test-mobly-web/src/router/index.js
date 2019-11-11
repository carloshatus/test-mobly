import Vue from "vue";
import Router from "vue-router";
import Dashboard from "@/components/pages/Dashboard";
import UserList from "@/components/pages/UserList";
import UserEdit from "@/components/pages/UserEdit";
import UserPosts from "@/components/pages/UserPosts";

Vue.use(Router);

export default new Router({
  mode: "history",
  routes: [
    {
      path: "/",
      name: "Dashboard",
      component: Dashboard
    },
    {
      path: "/users",
      name: "UserList",
      component: UserList
    },
    {
      path: "/users/add",
      name: "UserAdd",
      component: UserEdit
    },
    {
      path: "/users/:id/edit",
      name: "UserEdit",
      component: UserEdit
    },
    {
      path: "/users/:id/posts",
      name: "UserPosts",
      component: UserPosts
    }
  ]
});
