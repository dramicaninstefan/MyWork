import { useState, useEffect } from 'react'
import axios from 'axios'
import { TabTitle } from '../general/GeneralFuntions'

import News from '../News/News'
import Views from '../Destinations/Views'
import Location from '../Location/Location'

import './Home.module.css'
import Slider from '../Slider/Slider'

import image1 from '../../assets/BackgroundImage.jpg'
import image2 from '../../assets/1.jpg'
import image3 from '../../assets/2.jpg'

const slides = [{ url: image1 }, { url: image2 }, { url: image3 }]

const Home = () => {
  const [posts, setPosts] = useState([])
  const [isLoading, setIsLoading] = useState(false)

  TabTitle(`TeslaWays | Pocetna`)

  useEffect(() => {
    setIsLoading(true)
    axios
      .get('http://teslaways.net/api/api')
      .then((res) => {
        setPosts(res.data)
        setIsLoading(false)
      })
      .catch((err) => {
        console.log(err)
      })
  }, [])

  window.scrollTo(0, 0)

  return (
    <main>
      <Slider slides={slides}></Slider>
      <News data={posts} isLoading={isLoading} />
      <Views data={posts} isLoading={isLoading} />
      <Location />
    </main>
  )
}

export default Home
