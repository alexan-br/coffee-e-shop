describe("Add Random Product to Cart", () => {
    it("should navigate to a random product, increase quantity, and add to cart", () => {
        // Visit the /shop page
        cy.visit("http://coffee-e-shop.test/shop");

        // Wait for products to load
        cy.get(".product-card").should("have.length.greaterThan", 0);

        // Select a random product and click its "View" button
        cy.get(".product-card").then((products) => {
            // Get a random index
            const randomIndex = Math.floor(Math.random() * products.length);
            cy.wrap(products[randomIndex]).within(() => {
                cy.get(".view-button").click();
            });
        });

        // Verify we're on the product page
        cy.url().should("include", "/product/");

        // Increase the product amount
        cy.get(".increment").click();

        // Add the product to the cart
        cy.get(".add-to-cart-button").click();

        // Verify if the product was added to the cart/session
        // cy.window().then((win) => {
        //     // Assuming the cart is stored in session storage or in a Livewire component's state
        //     const cart = win.sessionStorage.getItem("cart");
        //     expect(cart).to.not.be.null;
        //     expect(JSON.parse(cart)).to.have.length.greaterThan(0);
        // });
        cy.window().then((win) => {
            cy.request("/session/quantities").then((response) => {
                const quantities = response.body;

                expect(quantities).to.not.be.empty;

                const productId = win.location.pathname.split("/").pop();
                expect(quantities[productId]).to.be.at.least(1);
            });
        });
    });
});
