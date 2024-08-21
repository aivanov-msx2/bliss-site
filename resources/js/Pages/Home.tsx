import React from "react";
import MainLayout from "../Layouts/MainLayout";
import { Link, Head } from "@inertiajs/inertia-react";
import MainContentContainer from "../Components/MainContentContainer";

export default function Home(props) {
    const title = "Home";
    return (
        <MainLayout
            header={title}
            headerSrc="/assets/img/hero/vines.png"
            headerHeight="h-56 sm:h-80 md:h-96 lg:h-128"
        >
            <Head title={title} />
            <MainContentContainer>
                <p>Bringing Hospitality to Fine Wine</p>
            </MainContentContainer>
        </MainLayout>
    );
}
