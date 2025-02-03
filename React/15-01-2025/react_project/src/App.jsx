import { BrowserRouter, Routes, Route} from "react-router-dom";
import Header from "./components/Header";
import Navbar from "./components/Navbar";
// import Footer from "./components/Footer";
import Home from "./pages/Home";
import Blog from "./pages/Blog";
import Contact from "./pages/Contact";
import About from "./pages/About";
import "/bootstrap/css/bootstrap.min.css";
import "/bootstrap/js/bootstrap.bundle.min.js";


function App() {


  return (
    <>
     <BrowserRouter>
      <Header />
      <Navbar />
      
    <Routes>

      <Route path="/" element={<Home />} />
      <Route path="/blog" element={<Blog />} />
      <Route path="/contact" element={<Contact />} />
      <Route path="/about" element={<About />} />
    
    </Routes>
    {/* <Footer /> */}
  </BrowserRouter>
     
    </>
  )
}

export default App;
