import React from "react";
import MainLayout from "../../Layouts/MainLayout";
import { Head } from "@inertiajs/inertia-react";
import MainContentContainer from "../../Components/MainContentContainer";

export default function Country({ countryData, wineries }) {
    const title = `Wines > ${countryData.name}`;
    return (
        <MainLayout header={title} headerSrc={countryData.countryImageFile}>
            <Head title={title} />
            <MainContentContainer>
                <h3 className="text-center mt-2 mb-1 text-red-700 text-xl">
                    Select a
                </h3>
                <h1 className="text-center text-4xl mb-6 pb-4">Winery</h1>

                <ul className="grid grid-cols-2 gap-4 md:grid-cols-3 md:gap-6 lg:grid-cols-4 lg:gap-8 px-12 text-center">
                    {wineries.map((winery) => (
                        <li className="relative" key={winery.slug}>
                            <a href={`/winery/${winery.slug}`}>
                                <img
                                    className=""
                                    src={winery.winemaker_image_file}
                                />
                                <span className="bg-black/70 text-white px-3 py-2 text-2xl absolute bottom-0 left-0 right-0">
                                    {winery.name}
                                </span>
                            </a>
                        </li>
                    ))}
                </ul>
            </MainContentContainer>
        </MainLayout>
    );
}
