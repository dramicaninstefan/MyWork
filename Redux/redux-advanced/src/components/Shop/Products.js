import ProductItem from './ProductItem'
import classes from './Products.module.css'

const DUMMY_PRODUCT = [
  { id: 'p1', price: 6, title: 'My First Book', description: 'My very first book' },
  { id: 'p2', price: 5, title: 'My Second Book', description: 'My very second book' },
  { id: 'p3', price: 10, title: 'My Third Book', description: 'My very third book' },
]

const Products = (props) => {
  return (
    <section className={classes.products}>
      <h2>Buy your favorite products</h2>
      <ul>
        {DUMMY_PRODUCT.map((product) => {
          return <ProductItem key={product.id} id={product.id} title={product.title} price={product.price} description={product.description} />
        })}
      </ul>
    </section>
  )
}

export default Products
