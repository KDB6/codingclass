<main id="main">
    <section id="petItemWrite">
        <h2>펫샵 상세보기 정보</h2>
        <div class="container">
            <form action="makePetShopItemSave.php" name="petItemWrite" method="post" enctype="multipart/form-data">
                <fieldset>
                    <legend>펫샵 상세보기 데이터 입력</legend>
                    <div>
                        <label for="shopItemBrand">상세보기 브랜드</label>
                        <input type="text" name="shopItemBrand" id="shopItemBrand" placeholder="상세보기 브랜드를 입력해주세요!" required >
                    </div>
                    <div>
                        <label for="shopItemItemName">상세보기 상품 이름</label>
                        <input type="text" name="shopItemItemName" id="shopItemItemName" placeholder="상세보기 상품 이름을 입력해주세요! " required >
                    </div>
                    <div>
                        <label for="shopItemItemTopEx">상세보기 상단 상품 설명</label>
                        <input type="text" name="shopItemItemTopEx" id="shopItemItemTopEx" placeholder="상세보기 상단 상품 설명을 입력해주세요!" required >
                    </div>
                    <div>
                        <label for="shopItemItemLink01">상세보기 상품 링크01</label>
                        <input type="text" name="shopItemItemLink01" id="shopItemItemLink01" placeholder="상세보기 상품 링크01을 입력해주세요!" required >
                    </div>
                    <div>
                        <label for="shopItemItemLink02">상세보기 상품 링크02</label>
                        <input type="text" name="shopItemItemLink02" id="shopItemItemLink02" placeholder="상세보기 상품 링크02을 입력해주세요!" required >
                    </div>
                    <div>
                        <label for="shopItemItemLink03">상세보기 상품 링크03</label>
                        <input type="text" name="shopItemItemLink03" id="shopItemItemLink03" placeholder="상세보기 상품 링크03을 입력해주세요!" required >
                    </div>
                    <div>
                        <label for="shopItemItemLink04">상세보기 상품 링크04</label>
                        <input type="text" name="shopItemItemLink04" id="shopItemItemLink04" placeholder="상세보기 상품 링크04을 입력해주세요!" required >
                    </div>
                    <div>
                        <label for="shopItemBotEx01">상세보기 하단 상품 설명01</label>
                        <input type="text" name="shopItemBotEx01" id="shopItemBotEx01" placeholder="상세보기 하단 상품 설명01을 입력해주세요!" required >
                    </div>
                    <div>
                        <label for="shopItemBotEx02">상세보기 하단 상품 설명02</label>
                        <input type="text" name="shopItemBotEx02" id="shopItemBotEx02" placeholder="상세보기 하단 상품 설명02을 입력해주세요!" required >
                    </div>
                    <div>
                        <label for="shopItemBotEx03">상세보기 하단 상품 설명03</label>
                        <input type="text" name="shopItemBotEx03" id="shopItemBotEx03" placeholder="상세보기 하단 상품 설명03을 입력해주세요!" required >
                    </div>
                    <div>
                        <label for="shopItemBotEx04">상세보기 하단 상품 설명04</label>
                        <input type="text" name="shopItemBotEx04" id="shopItemBotEx04" placeholder="상세보기 하단 상품 설명04을 입력해주세요!" required >
                    </div>
                    <div>
                        <label for="shopItemBotEx05">상세보기 하단 상품 설명05</label>
                        <input type="text" name="shopItemBotEx05" id="shopItemBotEx05" placeholder="상세보기 하단 상품 설명05을 입력해주세요!" required >
                    </div>
                    <div>
                        <label for="shopItemImgFile">펫샵 상세보기 이미지</label>
                        <input type="file" name="shopItemImgFile" id="shopItemImgFile" accept=".jpg, .jpeg, .png, .gif" placeholder="jpg, gif, png 파일만 넣어주세요!">
                    </div>
                    <button type="submit" value="저장하기">저장하기</button>
                </fieldset>
            </form>
        </div>
    </section>
    <!-- //pet shop -->
    
</main>
<!-- //main -->