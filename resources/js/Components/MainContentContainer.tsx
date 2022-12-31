import React from "react";

export default function MainContentContainer({ className = "", children }) {
    return (
        <div className={`${className} sm:px-6 lg:px-8 py-8`}>{children}</div>
    );
}
