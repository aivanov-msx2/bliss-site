import React, { useState } from "react";
import ApplicationLogo from "../Components/ApplicationLogo";
import Dropdown from "../Components/Dropdown";
import NavLink from "../Components/NavLink";
import ResponsiveNavLink from "../Components/ResponsiveNavLink";
import { Link } from "@inertiajs/inertia-react";
import route from "ziggy-js";
import Footer from "../Components/Footer";

export default function MainLayout({
    header,
    headerSrc,
    headerHeight,
    children,
}: {
    header?: String;
    headerSrc?: String;
    headerHeight?: String;
    children;
}) {
    const [showingNavigationDropdown, setShowingNavigationDropdown] =
        useState(false);

    const hasHeader = header || headerSrc;
    const contentPadding = "px-4 sm:px-6 lg:px-8";
    const contentUnderNavTopMargin = hasHeader ? "" : "mt-12";
    const defaultHeaderSrc = "/assets/img/hero/flowers.jpg";

    const headerHeightClasses = headerHeight
        ? headerHeight
        : "h-48 md:h-64 lg:h-96";

    return (
        <div className="min-h-screen flex flex-col ">
            <nav className="fixed z-10 top-0 left-0 right-0 bg-white border-b border-white drop-shadow-md">
                <div className={`max-w-7xl mx-auto ${contentPadding}`}>
                    <div className="flex justify-between h-20 grow">
                        <div className="flex grow">
                            <div className="shrink-0 flex items-center">
                                <Link href="/">
                                    <ApplicationLogo className="block h-14 w-auto fill-current text-gray-800" />
                                </Link>
                            </div>

                            <div className="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex grow justify-end">
                                <NavLink
                                    href={route("about")}
                                    active={route().current("about")}
                                >
                                    About
                                </NavLink>
                                <NavLink
                                    href={route("wines.index")}
                                    active={route().current("wines.index")}
                                >
                                    Wines
                                </NavLink>
                                <NavLink
                                    href={route("wholesale")}
                                    active={route().current("wholesale")}
                                >
                                    Wholesale
                                </NavLink>
                                <NavLink
                                    href={route("wineclub")}
                                    active={route().current("wineclub")}
                                >
                                    Wine Club
                                </NavLink>
                            </div>
                        </div>

                        <div className="-mr-2 flex items-center sm:hidden">
                            <button
                                onClick={() =>
                                    setShowingNavigationDropdown(
                                        (previousState) => !previousState
                                    )
                                }
                                className="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out"
                            >
                                <svg
                                    className="h-6 w-6"
                                    stroke="currentColor"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                >
                                    <path
                                        className={
                                            !showingNavigationDropdown
                                                ? "inline-flex"
                                                : "hidden"
                                        }
                                        strokeLinecap="round"
                                        strokeLinejoin="round"
                                        strokeWidth="2"
                                        d="M4 6h16M4 12h16M4 18h16"
                                    />
                                    <path
                                        className={
                                            showingNavigationDropdown
                                                ? "inline-flex"
                                                : "hidden"
                                        }
                                        strokeLinecap="round"
                                        strokeLinejoin="round"
                                        strokeWidth="2"
                                        d="M6 18L18 6M6 6l12 12"
                                    />
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>

                <div
                    className={
                        (showingNavigationDropdown ? "block" : "hidden") +
                        " sm:hidden"
                    }
                >
                    <div className="pt-2 pb-3 space-y-1">
                        <ResponsiveNavLink
                            href={route("about")}
                            active={route().current("about")}
                        >
                            About
                        </ResponsiveNavLink>
                        <ResponsiveNavLink
                            href={route("wines.index")}
                            active={route().current("wines.index")}
                        >
                            Wines
                        </ResponsiveNavLink>
                        <ResponsiveNavLink
                            href={route("wholesale")}
                            active={route().current("wholesale")}
                        >
                            Wholesale
                        </ResponsiveNavLink>
                        <ResponsiveNavLink
                            href={route("wineclub")}
                            active={route().current("wineclub")}
                        >
                            Wine Club
                        </ResponsiveNavLink>
                    </div>

                    <div className="pt-4 pb-1 border-t border-gray-200">
                        <div className="mt-3 space-y-1">
                            <ResponsiveNavLink href={route("contact")}>
                                Contact
                            </ResponsiveNavLink>
                        </div>
                    </div>
                </div>
            </nav>

            {hasHeader && (
                <header className={`${headerHeightClasses} flex mt-12`}>
                    <div
                        className={`max-w-7xl mx-auto flex flex-col h-full grow justify-end bg-local bg-bottom bg-no-repeat bg-cover ${contentPadding}  pb-1 md:pb-5`}
                        style={{
                            backgroundImage: `url(${
                                headerSrc ? headerSrc : defaultHeaderSrc
                            })`,
                        }}
                    >
                        <div>
                            {header && (
                                <h1 className="text-black text-2xl md:text-3xl lg:text-4xl p-2 md:py-4 md:px-6 mb-2 md:mb-4 bg-white/75 inline-block">
                                    {header}
                                </h1>
                            )}
                        </div>
                    </div>
                </header>
            )}

            <div className={`flex grow ${contentUnderNavTopMargin}`}>
                <main
                    className={`max-w-7xl mx-auto bg-gray-300  flex flex-col h-full grow`}
                >
                    {children}
                </main>
            </div>

            <Footer />
        </div>
    );
}
