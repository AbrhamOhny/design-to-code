import { createSSRApp, h } from "vue";
import { renderToString } from "@vue/server-renderer";
import { createInertiaApp } from "@inertiajs/vue3";
import { resolvePageComponent } from "laravel-vite-plugin/inertia-helpers";
import createServer from "@inertiajs/vue3/server";
import DashboardLayout from "./pages/layout/DashboardLayout.vue";

createServer((page) =>
    createInertiaApp({
        page,
        render: renderToString,
        resolve: async (name) => {
            const page = await resolvePageComponent(
                `./pages/${name}.vue`,
                import.meta.glob("./pages/**/*.vue", { eager: true }),
            );

            page.default.layout ??= name.startsWith("auth/") ? undefined : DashboardLayout;

            return page;
        },
        setup({ App, props, plugin }) {
            return createSSRApp({ render: () => h(App, props) }).use(plugin);
        },
    }),
);
