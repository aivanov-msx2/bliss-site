import React from "react";
import MainLayout from "../Layouts/MainLayout";
import { Link, Head } from "@inertiajs/inertia-react";
import MainContentContainer from "../Components/MainContentContainer";

export default function Wholesale(props) {
    const title = "Wholesale";
    return (
        <MainLayout header={title}>
            <Head title={title} />
            <MainContentContainer>
                <div className="max-w-lg pb-6 mx-auto">
<p><strong>California: Bliss Wine Imports</strong></p>
<p><strong>Andrey Ivanov, MS</strong> - President/CEO<br/>
<a href="mailto:andrey@blisswineconcierge.com">andrey@blisswineconcierge.com</a> - 314.799.5899</p>

<p><strong>Ben Herod</strong> - San Francisco, North Bay, Peninsula Sales<br/>
<a href="mailto:bbherod@gmail.com">bbherod@gmail.com</a> - 415.308.2266</p>

<p><strong>Parker Story</strong> - Oakland/East Bay Sales<br/>
<a href="mailto:parkerstorywine@gmail.com">parkerstorywine@gmail.com</a> - 205.440.0322</p>

<p><strong>Michael Frank</strong> - COO- Los Angeles/SoCal Sales<br/>
<a href="mailto:michael@blisswineconcierge.com">michael@blisswineconcierge.com</a> - 949.344.6588</p>
<p><strong>Missouri: Breakthru Beverage</strong></p>

<p><strong>James Hallett</strong> - Director of Fine Wine Sales<br/>
<a href="jhallett@breakthrubeverage.com">jhallett@breakthrubeverage.com</a> - 314.575.3528</p>
                </div>
            </MainContentContainer>
        </MainLayout>
    );
}
