import{G as o,P as a}from"./PrimaryButton.5fcaf48d.js";import{u as d,j as t,a as e,H as u,L as l}from"./app.96d280ee.js";import"./ApplicationLogo.4169c0df.js";function h({status:i}){const{post:n,processing:r}=d();return t(o,{children:[e(u,{title:"Email Verification"}),e("div",{className:"mb-4 text-sm text-gray-600",children:"Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn't receive the email, we will gladly send you another."}),i==="verification-link-sent"&&e("div",{className:"mb-4 font-medium text-sm text-green-600",children:"A new verification link has been sent to the email address you provided during registration."}),e("form",{onSubmit:s=>{s.preventDefault(),n(route("verification.send"))},children:t("div",{className:"mt-4 flex items-center justify-between",children:[e(a,{processing:r,children:"Resend Verification Email"}),e(l,{href:route("logout"),method:"post",as:"button",className:"underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500",children:"Log Out"})]})})]})}export{h as default};
