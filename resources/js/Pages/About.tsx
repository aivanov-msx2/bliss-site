import React from "react";
import MainLayout from "../Layouts/MainLayout";
import { Link, Head } from "@inertiajs/inertia-react";
import MainContentContainer from "../Components/MainContentContainer";

export default function About(props) {
    const title = "About Us";
    return (
        <MainLayout
            header={title}
            headerSrc="/assets/img/hero/hero-1.jpg"
            headerHeight="h-56 sm:h-80 md:h-96 lg:h-128"
        >
            <Head title={title} />

            <MainContentContainer>
                <div className="text-center px-6 py-6">
                    <h2 className="text-3xl pb-6">
                        We're dedicated to finding the world's most interesting wines, and telling their stories. 
                    </h2>
                    <p className="max-w-lg pb-6 mx-auto">
Founded in 2013 by Alleah Friedrichs and Erin Geyer, Bliss Wine Imports was a project born
from a passion for wine and learning. The ladies traveled extensively throughout Europe for
nine months to find the initial portfolio. Neither came from the wine trade, which made Bliss so refreshing and appealing to so many of our old friends. They chose the wine based on simple ideals of:
Is this a delicious wine?
Is it made in the right way, would I drink it as a health conscious person?
Is it the best wine at this price point among everything we tasted in the region?
How refreshing is that? 

On their first trip to the Dão in Portugal they met João Tavares de Pina at João Tavares Wines. He put them in touch with Andrey Ivanov, now a Master Sommelier, a title he shares with 278 persons worldwide since 1969. Andrey also has a passion and a mission to bring these wines to the US and has been a part of the team since 2015 in the role of Director of Wholesale Accounts. He also helped launch the sister company to Bliss in Mexico, Bliss Vinos MX in 2018. He purchased the company from Alleah and Erin in 2022 after they became proud moms of their beautiful daughter Jaya. He is excited to steer it into this new chapter while still keeping the ethos of the company intact.

At Bliss, we focus on smaller, family run wineries from the parts of the wine world oft overlooked by the mainstream. We look to the past, present, and future to tell a story about a place and the people that have created something that is both caught in the moment and timeless concurrently. We also want to bring an element of service and hospitality to the wine business. We strive to offer the same amazing experience to our members that are typically reserved for the upper echelon of the wine trade. We want to bring the wine to you, but also bring you to the wine if you are willing. 

We are focusing on the next wave of classic wine regions. Some parts of the wine world need more help in representation and having their story told than others. We look to the path less traveled. We introduced an e-commerce element that allows most consumers to access our wines from us at the same price they would pay at their local wine shop. Our wineries don’t make that much wine, so we go direct as there’s not enough for every corner of the country. Join our wine club, and get an even more curated experience from a different producer every month!
                </p></div>
            </MainContentContainer>
            <img src="assets/img/about/about-floris-vineyard.jpg" />
        </MainLayout>
    );
}
