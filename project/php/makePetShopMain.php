<main id="main">
    <section id="petShopWrite">
        <h2>펫샵 메인 사이트</h2>
        <div class="container">
            <form action="makePetShopMainSave.php" name="petShopWrite" method="post" enctype="multipart/form-data">
                <fieldset>
                    <legend>펫샵 메인 데이터 입력</legend>
                    <div>
                        <label for="bestBrand">베스트 브랜드</label>
                        <input type="text" name="bestBrand" id="bestBrand" placeholder="베스트 아이템 브랜드를 입력해주세요!" required >
                    </div>
                    <div>
                        <label for="bestName">베스트 이름</label>
                        <input type="text" name="bestName" id="bestName" placeholder="베스트 아이템 이름을 입력해주세요! " required >
                    </div>
                    <div>
                        <label for="bestPrice">베스트 가격</label>
                        <input type="text" name="bestPrice" id="bestPrice" placeholder="베스트 아이템 가격을 입력해주세요!" required >
                    </div>
                    <div>
                        <label for="categoeyBrand">카테고리 아이템 브랜드</label>
                        <input type="text" name="categoeyBrand" id="categoeyBrand" placeholder="카테고리 아이템 브랜드를 입력해주세요!" required >
                    </div>
                    <div>
                        <label for="categoryName">카테고리 아이템 이름</label>
                        <input type="text" name="categoryName" id="categoryName" placeholder="카테고리 아이템 이름을 입력해주세요!" required >
                    </div>
                    <div>
                        <label for="categoryPrice">카테고리 아이템 가격</label>
                        <input type="text" name="categoryPrice" id="categoryPrice" placeholder="카테고리 아이템 가격을 입력해주세요!" required >
                    </div>
                    <div>
                        <label for="shopImgFile">펫샵 이미지</label>
                        <input type="file" name="shopImgFile" id="shopImgFile" accept=".jpg, .jpeg, .png, .gif" placeholder="jpg, gif, png 파일만 넣어주세요!">
                    </div>
                    <button type="submit" value="저장하기">저장하기</button>
                </fieldset>
            </form>
        </div>
    </section>
    <!-- //pet shop -->
    
</main>
<!-- //main -->