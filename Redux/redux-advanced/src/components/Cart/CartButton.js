import { useSelector, useDispatch } from 'react-redux'

import { uiActions } from '../../store/ui-slice'

import classes from './CartButton.module.css'

const CartButton = (props) => {
  const cartQuantity = useSelector((state) => state.cart.totalQuantity)
  const dispatch = useDispatch()

  const toogleCartHandler = () => {
    dispatch(uiActions.toggle())
  }

  return (
    <button className={classes.button} onClick={toogleCartHandler}>
      <span>My Cart</span>
      <span className={classes.badge}>{cartQuantity}</span>
    </button>
  )
}

export default CartButton
