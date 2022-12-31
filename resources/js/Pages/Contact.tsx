import React from "react";
import MainLayout from "../Layouts/MainLayout";
import { Link, Head } from "@inertiajs/inertia-react";
import MainContentContainer from "../Components/MainContentContainer";

export default function Contact(props) {
    const title = "Contact Us";
    return (
        <MainLayout header={title}>
            <Head title={title} />
            <MainContentContainer>
                <h2>Email</h2>
                <p>
                    <Link href="mailto:info@blisswineconcierge.com">
                        info@blisswineconcierge.com
                    </Link>
                </p>
            </MainContentContainer>
        </MainLayout>
    );
}
