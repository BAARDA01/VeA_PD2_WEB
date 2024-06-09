import React from "react";

function PageDesign() {
    return (
        <React.Fragment>
            <head>
                <meta charset="UTF-8" />
                <meta name="viewport" content="width=device-width, initial-scale=1.0" />
                <title>Grāmatas</title>
                <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" />
            </head>
            <body>
                <div id="root">
                    <header className="bg-primary text-white text-center p-3">
                        <h1>Laipni lūdzam PD2 "GRĀMATAS"</h1>
                        <nav>
                            <ul className="nav justify-content-center">
                                <li className="nav-item"><a className="nav-link text-white" href="#Author">Autori</a></li>
                                <li className="nav-item"><a className="nav-link text-white" href="#Book">Grāmatas</a></li>
                                <li className="nav-item"><a className="nav-link text-white" href="#Genre">Žanri</a></li>
                            </ul>
                        </nav>
                    </header>
                    <main className="container mt-4">
                        <section id="author" className="mb-4">
                            <h2 className="bg-secondary text-white p-2">Autori</h2>
                        </section>
                        <section id="book" className="mb-4">
                            <h2 className="bg-secondary text-white p-2">Grāmatas</h2>
                        </section>
                        <section id="genre" className="mb-4">
                            <h2 className="bg-secondary text-white p-2">Žanri</h2>
                        </section>
                    </main>
                    <footer className="bg-dark text-white text-center p-3 mt-auto">
                        <p>© Kārlis Bērziņš , VeA  2024.</p>
                    </footer>
                </div>
            </body>
        </React.Fragment>
    );
}

export default PageDesign;
