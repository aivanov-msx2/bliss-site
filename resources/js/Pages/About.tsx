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
                    <div className="mx-auto">
<p><strong>Founded in 2013 by Alleah Friedrichs and Erin Geyer</strong>, Bliss Wine Imports was a project born from a passion for wine and learning. The ladies traveled extensively throughout Europe for nine months to find the initial portfolio. Neither came from the wine trade, which made Bliss so refreshing and appealing to so many of our old friends. They chose the wine based on simple ideals of:</p>
<ul>
    <li>Is this a delicious wine?</li>
    <li>Is it made in the right way, would I drink it as a health conscious person?</li>
    <li>Is it the best wine at this price point among everything we tasted in the region?</li>
    <li>How refreshing is that?</li> 
</ul>
<br/>
<p>On their first trip to the Dão in Portugal they met João Tavares de Piña. He put them in touch with Andrey Ivanov, now a Master Sommelier, a title he shares with 278 persons worldwide since 1969. Andrey also has a passion and a mission to bring these wines to the US and has been a part of the team since 2015 in the role of Director of Wholesale Accounts. He also helped launch the sister company to Bliss in Mexico, Bliss Vinos MX, in 2018. He purchased the company from Alleah and Erin in 2022 after they became proud moms of their beautiful daughter Jaya. He is excited to steer it into this new chapter while still keeping the ethos of the company intact.
</p>
<br/>
<p><strong>At Bliss, we focus on smaller, family run wineries that tell a story.</strong> They speak to the past, present, and future of a place and of people that have created something both caught in the moment and timeless. We strive to make it easier to tell that story in a restaurant, a wine shop, or at your table. We want to bring an element of service and hospitality to the wine business, hence Concierge. We work with wholesale clients small and large that can spread these stories to their clients.</p>
<br/>
<p><strong>We are focusing on the next wave of classic wine regions. Some parts of the wine world need more help in representation and having their story told than others.</strong> We look to the path less traveled. Our wineries don’t make that much wine, so we go direct as there’s not enough for every corner of the country. We strive to offer the same amazing experience to our members that are typically reserved for the upper echelon of the wine trade. We want to bring the wine to you, but also bring you to the wine if you are willing. Join our wine club, and get an even more curated experience from a different producer every month! 
</p>
                </div></div>
            </MainContentContainer>
            <img src="assets/img/about/about-floris-vineyard.jpg" />
        </MainLayout>
    );
}
