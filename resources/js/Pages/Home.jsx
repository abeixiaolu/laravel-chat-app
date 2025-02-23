import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout";
import ChatLayout from "@/Layouts/ChatLayout";
import { Head } from "@inertiajs/react";

function Home() {
    return (
        <div>
            <Head title="Home" />
            <h1>Home</h1>
        </div>
    );
}

Home.layout = (page) => (
    <AuthenticatedLayout>
        <ChatLayout>{page}</ChatLayout>
    </AuthenticatedLayout>
);

export default Home;
