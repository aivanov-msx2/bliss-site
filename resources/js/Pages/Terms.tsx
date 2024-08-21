import React from "react";
import MainLayout from "../Layouts/MainLayout";
import { Head } from "@inertiajs/inertia-react";
import MainContentContainer from "../Components/MainContentContainer";

export default function Terms(props) {
    const title = "Terms";
    return (
        <MainLayout header={title}>
            <Head title={title} />
            <MainContentContainer>
                <p>{title}</p>
            </MainContentContainer>
        </MainLayout>
    );
}
