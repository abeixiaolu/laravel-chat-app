import { usePage } from "@inertiajs/react";

export default function ChatLayout({ children }) {
    const page = usePage();
    const conversations = page.props.conversations;
    const selectedConversation = page.props.selectedConversation;
    return (
        <div>
            <h1>chat layout</h1>
            <div>{children}</div>
        </div>
    );
}
