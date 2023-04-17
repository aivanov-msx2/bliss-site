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
<p><b>California:</b></p>

<p>Andrey Ivanov, MS - President/CEO - andrey@blisswineimports.com - 314.799.5899 (NorCal Sales)</p>
<p>Ben Herod- SF Sales- bbherod@gmail.com 415.308.2266</p>
<p>Parker Story- Oakland/East Bay Sales- parkerstorywine@gmail.com 205.440.0322</p>
<p>Michael Frank - COO- michael@blisswineconcierge.com - 949.344.6588 (SoCal Sales)</p>

<p><b>Missouri:</b></p>
<p>James Hallett: Breakthru Beverage: jhallett@breakthrubeverage.com (314) 575-3528</p>
                </div>
            </MainContentContainer>
        </MainLayout>
    );
}
