import React from "react";

export default function Landing() {
    return (
        <div className="min-h-screen bg-gray-100 font-sans">

            {/* Navbar */}
            <nav className="bg-white shadow px-10 py-4 flex justify-between items-center">
                <div className="flex items-center gap-3">
                    <img src="/images/wikrama-logo.png" className="w-10" />
                    <span className="font-semibold text-lg">Inventory</span>
                </div>

                <a href="/login" className="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-md transition">
                    Login
                </a>
            </nav>

            {/* Hero */}
            <section className="text-center mt-16 px-6">
                <h1 className="text-3xl font-bold">
                    Manajemen Peminjaman
                </h1>
                <p className="text-gray-500 mt-2">(Inventaris)</p>

                {/* Cards */}
                <div className="grid md:grid-cols-4 gap-8 mt-12">

                    <Card title="Items Data" color="bg-blue-900 text-white" />
                    <Card title="Management Technician" color="bg-yellow-400 text-black" />
                    <Card title="Managed Lending" color="bg-purple-300 text-black" />
                    <Card title="All Can Borrow" color="bg-green-400 text-black" />

                </div>
            </section>
        </div>
    );
}

function Card({ title, color }) {
    return (
        <div className={`${color} p-10 rounded-xl shadow-lg hover:scale-105 transition`}>
            <p className="font-semibold">{title}</p>
        </div>
    );
}