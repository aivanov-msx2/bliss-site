import{M as i,a as c}from"./MainContentContainer.74afd7b6.js";import{j as a,a as e,H as n}from"./app.1280751b.js";import"./ApplicationLogo.0fd4ee88.js";import"./index.m.bda6b9fa.js";function x({countryData:l,wineries:s}){const r=`Wines > ${l.name}`;return a(i,{header:r,headerSrc:l.countryImageFile,children:[e(n,{title:r}),a(c,{children:[e("h3",{className:"text-center mt-2 mb-1 text-red-700 text-xl",children:"Select a"}),e("h1",{className:"text-center text-4xl mb-6 pb-4",children:"Winery"}),e("ul",{className:"grid grid-cols-2 gap-4 md:grid-cols-3 md:gap-6 lg:grid-cols-4 lg:gap-8 px-12 text-center",children:s.map(t=>e("li",{className:"relative",children:a("a",{href:`/winery/${t.slug}`,children:[e("img",{className:"",src:t.winemaker_image_file}),e("span",{className:"bg-black/70 text-white px-3 py-2 text-2xl absolute bottom-0 left-0 right-0",children:t.name})]})},t.slug))})]})]})}export{x as default};