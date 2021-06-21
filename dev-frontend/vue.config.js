module.exports = {
  // baseUrl: '/public/haloo/',
  // assetsPublicPath: '/public/haloo/',
  // outputDir: "../backend/public",
  // publicPath: process.env.NODE_ENV === "production" ? "/public/haloo/" : "/",
  // indexPath:
  //   process.env.NODE_ENV === "production"
  //     ? "../resources/views/index.blade.php"
  //     : "index.html",
  css: {
    loaderOptions: {
      css: {
        sourceMap: process.env.NODE_ENV !== "production" ? true : false
      }
    }
  }
};
