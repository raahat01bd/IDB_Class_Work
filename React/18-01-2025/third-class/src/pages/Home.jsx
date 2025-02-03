import  { useState } from 'react';

function Home() {
    const [price, setPrice] = useState(0);  // Define state here

    const increase = () => {
        setPrice(price + 1);  // Increment the price by 1
    }

    const decrease = () => {
        setPrice(price - 1);  // Decrement the price by 1
    }
    

    return (
        <div>
            Count = {price}
            <button onClick={increase}>Increase</button>
            <button onClick={decrease}>Decrease</button>
        </div>
    );
}

export default Home;
