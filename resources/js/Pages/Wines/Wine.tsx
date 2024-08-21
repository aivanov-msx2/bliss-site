import React from "react";
import MainLayout from "../../Layouts/MainLayout";
import { Head } from "@inertiajs/inertia-react";
import MainContentContainer from "../../Components/MainContentContainer";
import route from "ziggy-js";

export default function Wine({
    wine,
    winery,
    wineryImg,
    wineImg,
    wineData,
    region,
    regionImg,
    country,
    grapes,
}) {
    const title = `${wine.name}`;
    const areaHeaderClassName =
        "bg-red-800 text-white py-3 px-6 mb-0 uppercase text-xl";

    const introBlock = (title, value, url = "") => {
        if (!value) return;
        return (
            <>
                <div className="text-gray-500 uppercase">{title}</div>
                {!!url && (
                    <div className="text-lg mb-3">
                        <a className="text-red-800" href={url}>
                            {value}
                        </a>
                    </div>
                )}
                {!url && (
                    <div className="text-red-800 text-lg mb-3">{value}</div>
                )}
            </>
        );
    };
    const profileDataBlock = (title, value) => {
        if (!value) return;
        return (
            <>
                <div className="text-red-800 uppercase text-sm">{title}</div>
                <div className="mb-6">{value}</div>
            </>
        );
    };
    const detailDataBlock = (title, value, index) => {
        if (!value) return;
        return (
            <div className="mb-4 pl-6" key={index}>
                <div className="text-red-800">{title}</div>
                <div className="mb-6">{value}</div>
            </div>
        );
    };

    return (
        <MainLayout headerSrc={wineryImg} headerHeight="h-80 md:h-128 lg:h-160">
            <Head title={title} />
            <MainContentContainer>
                <div className="flex">
                    <div className="w-1/4">
                        <img
                            className="max-w-full -mt-[7rem] border-[2rem] border-gray-300"
                            src={`${wineImg}`}
                            alt=""
                        />
                    </div>
                    <div className="w-3/4">
                        <div className="text-4xl mb-4">{title}</div>
                        {introBlock("Vintage", wine.vintage)}
                        {introBlock(
                            "Producer",
                            winery.name,
                            `/winery/${winery.slug}/`
                        )}
                        {introBlock(
                            "Region",
                            `${region.name}, ${country.name}`
                        )}

                        <div className="mt-6">{/*spacer*/}</div>

                        {profileDataBlock(
                            "Grapes",
                            grapes.map((grape, index) => {
                                return (
                                    <div key={index} className="block">
                                        {grape.name}{" "}
                                        <span className="italic">
                                            {grape.pivot.percentage}%
                                        </span>
                                    </div>
                                );
                            })
                        )}
                        {profileDataBlock("Profile", wine.text_profile)}
                        {profileDataBlock(
                            "Grape Growing",
                            wine.text_grape_growing
                        )}
                        {profileDataBlock("Winemaking", wine.text_winemaking)}
                        {profileDataBlock(
                            "More About the Wine",
                            wine.text_more_about_the_wine
                        )}
                    </div>
                </div>
                <div className="flex pt-6">
                    <div className={`${regionImg ? "w-4/6" : ""} mr-6`}>
                        <h3 className={areaHeaderClassName}>Wine Data</h3>
                        <div className="mt-6">
                            {wineData.map((item, index) =>
                                detailDataBlock(item.title, item.value, index)
                            )}
                        </div>
                    </div>

                    {regionImg && (
                        <div className="w-2/6">
                            <h3 className={areaHeaderClassName}>Region Map</h3>
                            <img
                                className="w-full bg-white mt-6"
                                src={regionImg}
                            />
                        </div>
                    )}
                </div>
                <div className="mt-6">
                    <h3 className={areaHeaderClassName}>Downloads</h3>
                    <div className="m-6 mb-0">
                        <a
                            className="block mt-4"
                            href={route("pdf.specSheet", [
                                winery.slug,
                                wine.slug,
                                0,
                            ])}
                        >
                            Spec Sheet PDF
                        </a>

                        <a
                            className="block mt-4"
                            href={route("pdf.shelfTalker", [
                                winery.slug,
                                wine.slug,
                                0,
                            ])}
                        >
                            Shelf Talker PDF
                        </a>
                    </div>
                </div>
            </MainContentContainer>
        </MainLayout>
    );
}
