import { BrowserRouter, Route, Routes } from "react-router-dom"

import Navbar from "./components/Navbar"
import Sidebar from "./components/Sidebar"
import Home from "./pages/Home"
import Destructire from "./pages/Destructure"
// import Footer from "./components/Footer"
// import About from "./components/About"
// import Contact from "./components/Contact"
// import NotFound from "./components/NotFound"



function App() {
 

  return (
    <>
       <BrowserRouter>
       <div className="app-wrapper">
      <Navbar />
      <Sidebar />
      
    <Routes>

    <Route path="/home" element={<Home />} />
    <Route path="/" element={<Destructire />} />

    
    </Routes>
    {/* <Footer /> */}
    </div>
  </BrowserRouter>
    </>
  )
}

export default App
