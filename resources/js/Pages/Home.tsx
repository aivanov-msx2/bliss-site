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
                <div className="sm:px-6 lg:px-8">
                    <div className="sm:px-6 lg:px-8">
                        <h4><a href="https://store.blisswineconcierge.com/clubs/Member-Monthly-Membership" target="_blank"><img alt="" src="https://store.blisswineconcierge.com/assets/client/Image/CapturadePantalla2023-03-11alas21.09.07.png" /></a></h4>
                    </div>

                    <div className="sm:px-6 lg:px-8">
                        <h4><a href="https://store.blisswineconcierge.com/Wines/Browse-by-Country/Australia/Castagna"><img alt="" src="https://store.blisswineconcierge.com/assets/client/Image/CapturadePantalla2023-03-11alas21.09.30.png"/></a></h4>
                    </div>
                </div>
            </MainContentContainer>
        </MainLayout>
    );
}
