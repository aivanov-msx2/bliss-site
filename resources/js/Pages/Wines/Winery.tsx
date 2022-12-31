import React from "react";
import MainLayout from "../../Layouts/MainLayout";
import { Head } from "@inertiajs/inertia-react";
import MainContentContainer from "../../Components/MainContentContainer";

export default function Winery({
    winery,
    wineryData,
    wineryImg,
    winemakerImg,
    regionImg,
    region,
    country,
    wines,
    wineImgLocation,
}) {
    const title = `${winery.name}`;
    const areaHeaderClassName =
        "bg-red-800 text-white py-3 px-6 mb-0 uppercase text-xl";

    const introBlock = (title, value) => {
        if (!value) return;
        return (
            <>
                <div className="text-gray-500 uppercase">{title}</div>
                <div className="text-red-800 text-lg mb-3">{value}</div>
            </>
        );
    };
    const profileDataBlock = (title, value) => {
        if (!value) return;
        return (
            <>
                <div className="text-red-800 uppercase text-sm">{title}</div>
                <p>{value}</p>
            </>
        );
    };
    const detailDataBlock = (title, value, index) => {
        if (!value) return;
        return (
            <div className="mb-4 pl-6" key={index}>
                <div className="text-red-800">{title}</div>
                <div className="">{value}</div>
            </div>
        );
    };

    const wineComponent = (wine, index) => {
        return (
            <div className="bg-white mb-6 p-6 flex" key={index}>
                <div className="w-1/4 mb-2 pr-6">
                    {!!wine.image_file && (
                        <img
                            className=""
                            src={`${wineImgLocation}/${wine.image_file}`}
                            alt=""
                        />
                    )}
                    {!wine.image_file && (
                        <img
                            className=""
                            src={`/assets/img/default-wine.png`}
                            alt=""
                        />
                    )}
                </div>
                <div className="w-3/4">
                    <div className="mt-6 mb-3 text-xl">{winery.name}</div>
                    <div className="mb-3 border-b border-gray-300 inline-block text-3xl">
                        <a href={`/wine/${winery.slug}/${wine.slug}`}>
                            {wine.name}
                        </a>
                    </div>
                    <div className="mb-3 text-base">{wine.vintage}</div>
                    <button className="mt-6 mb-6 block">
                        <a
                            className="rounded-md px-4 py-2 bg-gray-200 text-gray-700 text-lg border border-gray-500"
                            href={`/wine/${winery.slug}/${wine.slug}`}
                        >
                            Learn More
                        </a>
                    </button>
                </div>
            </div>
        );
    };
    return (
        <MainLayout headerSrc={wineryImg} headerHeight="h-80 md:h-128 lg:h-160">
            <Head title={title} />
            <MainContentContainer>
                <img
                    className="float-left -mt-[7rem] border-[2rem] border-gray-300"
                    src={`${winemakerImg}`}
                    alt=""
                />
                <div className="text-4xl mb-4">{title}</div>
                {introBlock("Region", `${region.name}, ${country.name}`)}
                {introBlock("Winemaker", `${winery.winemaker_full_name}`)}

                <div className="mt-3">{/*spacer*/}</div>

                <p>{winery.winemaker_long_description}</p>
                {profileDataBlock("Philosophy", winery.winemaker_philosophy)}

                <div className="flex pt-6">
                    <div className="w-4/6 mr-6">
                        <h3 className={areaHeaderClassName}>Winery Data</h3>
                        <div className="mt-6">
                            {wineryData.map((item, index) =>
                                detailDataBlock(item.title, item.value, index)
                            )}
                        </div>
                    </div>
                    <div className="w-2/6">
                        <h3 className={areaHeaderClassName}>Region Map</h3>
                        <img
                            src={regionImg}
                            alt=""
                            className="w-full bg-white mt-6"
                        />
                    </div>
                </div>
                <div className="mt-6">
                    <h3 className={areaHeaderClassName}>Wines We Import</h3>
                    <div className="mt-6">
                        {wines.map((wine, index) => wineComponent(wine, index))}
                    </div>
                </div>
            </MainContentContainer>
        </MainLayout>
    );
}
