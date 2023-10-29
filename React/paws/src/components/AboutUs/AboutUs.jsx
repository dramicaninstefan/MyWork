import React, { Fragment } from 'react'

import TabTitle from '../general/TabTitle'

import Header from '../Header/Header'

import classes from './AboutUs.module.css'

const AboutUs = () => {
  TabTitle('Pet | O Nama')
  window.scrollTo(0, 0)

  return (
    <Fragment>
      <Header />
      <div className={classes.container}>
        {/* <h1 className={classes.title}>O Nama</h1> */}
        <p className={classes.desctiption}>
          Lorem ipsum dolor sit amet consectetur adipisicing elit. Debitis enim nobis, in nulla cum nam quos iure ratione delectus repudiandae illo commodi itaque. Dolores nobis sed totam corporis aut
          facilis eveniet vero minima officiis excepturi beatae delectus qui eum officia dicta aspernatur commodi quas, porro possimus esse nisi. Voluptatum tempora quae error ab cumque omnis ducimus
          sint nam. Dolorem non, ipsam amet at ea quasi accusamus provident atque reiciendis, doloribus distinctio voluptatum iusto officiis adipisci quaerat facere velit voluptate magni pariatur
          neque qui ducimus? Ipsa similique, iure ab minima iusto aliquam delectus placeat numquam fugit maxime quaerat dolores et distinctio soluta saepe officia ut quasi at sequi unde temporibus
          animi porro nulla. Ea nemo distinctio nesciunt eos unde maiores animi iure inventore, corporis eveniet illo fugiat eum nulla veniam, ad iusto illum eius temporibus soluta accusamus
          quibusdam. Fuga, voluptatem quaerat. Deserunt qui tempora necessitatibus doloremque veniam consequatur adipisci sed ullam nobis voluptate hic atque laudantium amet nulla sequi repudiandae
          iste sunt, voluptatem, a ab voluptatum tenetur! Illum nisi, mollitia officiis cupiditate facere quis dolor, commodi blanditiis quasi temporibus eaque explicabo ullam magni eligendi
          distinctio tenetur assumenda esse laboriosam quaerat. Voluptatibus praesentium culpa sunt provident magni impedit quod debitis iusto ut.
        </p>
      </div>
    </Fragment>
  )
}

export default AboutUs
