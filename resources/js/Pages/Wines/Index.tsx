import React from "react";
import MainLayout from "../../Layouts/MainLayout";
import { Head } from "@inertiajs/inertia-react";
import MainContentContainer from "../../Components/MainContentContainer";

export default function Wines({ countries, randomHeroSrc }) {
    const title = "Wines";
    return (
        <MainLayout header={title} headerSrc={randomHeroSrc}>
            <Head title={title} />
            <MainContentContainer>
                <h3 className="text-center mt-2 mb-1 text-red-700 text-xl">
                    View Wines By
                </h3>
                <h1 className="text-center text-4xl mb-6 pb-4">Country</h1>

                <ul className="grid grid-cols-2 gap-4 md:grid-cols-3 md:gap-6 lg:grid-cols-4 lg:gap-8 px-12 text-center">
                    {countries.map((country) => (
                        <li className="relative w-full" key={country.slug}>
                            <a
                                href={`/wines/${country.slug}`}
                                className="flex items-center justify-center bg-cover bg-no-repeat bg-center h-64 px-6"
                                style={{
                                    backgroundImage: `url(${country.country_thumb_file})`,
                                }}
                            >
                                {/* <img
                                    className=""
                                    src={country.country_thumb_file}
                                /> */}
                                <span className="bg-black/70 h-auto h-12 text-white px-3 py-2 text-2xl flex-1">
                                    {country.name}
                                </span>
                            </a>
                        </li>
                    ))}
                </ul>
            </MainContentContainer>
        </MainLayout>
    );
}
