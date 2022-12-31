import React from "react";
import AuthenticatedLayout from "../Layouts/AuthenticatedLayout";
import { Head, useForm } from "@inertiajs/inertia-react";
import route from "ziggy-js";
import { Inertia } from "@inertiajs/inertia";

export default function Admin(props) {
    const formContents: {
        csv: File | null;
    } = {
        csv: null,
    };

    const { data, setData } = useForm(formContents);

    const { flash } = props;

    function submit(e) {
        e.preventDefault();
        if (data.csv) {
            Inertia.post(route("csv.wine.upload"), {
                _method: "put",
                csv: data.csv,
            });
        }
    }

    const btnClass =
        "inline-block mt-3 text-white bg-black rounded-full p-2 px-5";

    return (
        <AuthenticatedLayout
            auth={props.auth}
            errors={props.errors}
            header={
                <h2 className="font-semibold m-0 text-xl text-gray-800 dark:text-gray-300 leading-tight">
                    Admin
                </h2>
            }
        >
            <Head title="Admin" />

            <div className="py-12">
                <div className="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div className="bg-white dark:bg-gray-700 overflow-hidden shadow-sm sm:rounded-lg">
                        <div className="p-6 text-gray-900">
                            <h3 className="dark:text-gray-200">
                                Download PDFs
                            </h3>
                            <ul>
                                <li className="mb-4">
                                    <a
                                        href={route(
                                            "pdf.pricebook.distributor"
                                        )}
                                        className="ml-4 text-gray-700 dark:text-gray-300 underline"
                                    >
                                        Price Book (Distributor)
                                    </a>
                                </li>
                                <li className="mb-4">
                                    <a
                                        href={route("pdf.pricebook.wholesale")}
                                        className="ml-4 text-gray-700 dark:text-gray-300 underline"
                                    >
                                        Price Book (Wholesale)
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div className="bg-white dark:bg-gray-700 overflow-hidden shadow-sm sm:rounded-lg mt-6">
                        <div className="p-6 text-gray-900">
                            <h3 className="dark:text-gray-200">
                                Download Wines CSV
                            </h3>
                            <ul>
                                <li className="mb-4">
                                    <a
                                        href={route("csv.wine.download")}
                                        className={btnClass}
                                    >
                                        Download All Wines CSV
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div className="bg-white dark:bg-gray-700 overflow-hidden shadow-sm sm:rounded-lg mt-6">
                        <div className="p-6 text-gray-900">
                            <h3 className="dark:text-gray-200">
                                Bulk Edit Wines
                            </h3>
                            <div>
                                {flash.message && (
                                    <div className="alert text-white">
                                        {flash.message}
                                    </div>
                                )}
                                <form onSubmit={submit}>
                                    <input
                                        type="file"
                                        className="block mt-3 text-white bg-gray-500 rounded-full p-2 px-5"
                                        onChange={(e) => {
                                            if (e.target?.files?.[0]) {
                                                setData(
                                                    "csv",
                                                    e.target.files[0]
                                                );
                                            }
                                        }}
                                    />

                                    <button className={btnClass} type="submit">
                                        Upload Wines CSV
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </AuthenticatedLayout>
    );
}
