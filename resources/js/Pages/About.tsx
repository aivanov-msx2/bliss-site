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
                        We're dedicated to finding the world's best natural
                        wines.
                    </h2>
                    <p className="max-w-lg pb-6 mx-auto">
                        <b>
                            Every wine we evaluate involves an in-depth
                            exploration
                        </b>{" "}
                        of the place, people and processes that make the wine
                        what it is.
                    </p>
                    <div className="grid grid-cols-2">
                        <p className="max-w-lg">
                            <b>We're driven by our love for amazing wine.</b> We
                            spend days, weeks, and months in foreign countries
                            getting to know the languages, the people, the
                            cultures. We explore long, winding dirt roads and
                            find hidden vineyards that don't show up on maps.
                        </p>

                        <p className="max-w-lg">
                            <b>We get lost in remote villages</b> and have to
                            ask for directions using hand signals more than we'd
                            like to admit. We hike muddy fields and climb steep
                            hillsides searching for people who make amazing
                            wine. We never stop learning and we appreciate
                            beyond measure the incredible job we have.
                        </p>
                    </div>
                </div>
            </MainContentContainer>
            <img src="assets/img/about/about-floris-vineyard.jpg" />
        </MainLayout>
    );
}
