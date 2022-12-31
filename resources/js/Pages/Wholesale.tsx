import React from "react";
import MainLayout from "../Layouts/MainLayout";
import { Link, Head } from "@inertiajs/inertia-react";
import MainContentContainer from "../Components/MainContentContainer";

export default function Wholesale(props) {
    const title = "Wholesale";
    return (
        <MainLayout header={title}>
            <Head title={title} />
            <MainContentContainer>
                <p>{title}</p>
            </MainContentContainer>
        </MainLayout>
    );
}
