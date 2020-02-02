import VueRouter from "vue-router";

const Foo = { template: '<div>foo</div>' };

const router = new VueRouter({
    routes: [
        {
            path: '/foo',
            component: Foo,
        }
    ]
});

export default router;