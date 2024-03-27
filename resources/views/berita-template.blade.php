@extends('layouts.main')

@section('Main')

<div class="grid grid-cols-2 place-items-center">
    <!-- Title -->
    <div class="col-span-2">
        <h1 class="font-bold text-2xl text-center">Sabung Ojik</h1>

        <p class="text-sm text-slate-600 my-3">Selasa, 26 Mar 2024 22:48 WIB</p>
    </div>
    <!-- Title -->

    <!-- Image -->
    <div class="col-span-2 my-5">
        <img class="w-full h-full" src="{{ asset('image/admin.png') }}">
    </div>
    <!-- Image -->

    <!-- Text -->
    <div class="col-span-2 h-full w-full">
        <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Sapiente tempore perspiciatis aliquid tenetur velit
            voluptates, ut repudiandae harum non dolorem eligendi earum, sequi animi doloremque fugiat blanditiis quasi
            aspernatur quibusdam!
            Impedit earum maiores deserunt quis sunt illo eum? Quae quis vitae soluta porro ducimus! Quo necessitatibus
            rerum ipsam dolorem dignissimos, cumque architecto totam dolorum cum. Veritatis atque vel impedit magni!
            Ab architecto sunt minima perferendis sed fugiat incidunt impedit minus dolorum, similique repellat totam
            doloribus dolor soluta quia non alias fugit nobis. Odio placeat ab aperiam fugit incidunt cupiditate
            voluptates.
            Officia aliquid ipsam sunt commodi pariatur vel unde velit odit, provident laboriosam sequi sapiente? Ab
            velit amet aspernatur sunt rerum est, eveniet doloribus ad dicta repudiandae similique earum ipsum
            molestiae.
            Nemo velit autem, sapiente ducimus doloremque nam minima ea esse aspernatur commodi numquam ipsa maiores
            molestias qui quis illo. Reprehenderit cum odio commodi quibusdam, at nisi vero consequuntur impedit
            tempore?
            Atque consequuntur blanditiis consectetur recusandae ab ea reiciendis expedita, quidem error harum sequi
            quos cupiditate molestiae fugit voluptas suscipit explicabo, pariatur ratione aspernatur ut corporis eius
            architecto? Tempore, unde ullam?
            Veritatis ullam quibusdam magnam, vel excepturi ea ab, cum sequi illum quaerat laudantium totam est nisi
            tempore ipsum unde modi! Alias illo unde harum quis repellendus ipsam tempora atque vitae.
            Cum et nostrum ipsam qui suscipit sit molestiae odit delectus aspernatur quisquam magnam adipisci, minus
            dicta aliquam tenetur dolor reprehenderit tempora nam obcaecati esse porro sint! Unde quo rem saepe!
            Sit alias nostrum magni eligendi tempore dolorem error vel iusto ut vero nihil quod, ipsum a ea recusandae
            fugiat consequuntur, velit, facere ducimus labore sed sunt doloremque. Inventore, corporis nemo?
            Culpa fugiat magnam obcaecati blanditiis aspernatur, esse a corporis molestias amet cumque est autem
            expedita provident et recusandae quibusdam nulla perferendis nobis eos sequi aliquid. Facilis dolore
            praesentium molestiae fuga.</p>
        <p>
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Molestiae molestias, nihil amet velit architecto
            consequatur saepe, suscipit repellat maxime earum quasi excepturi ipsam, sit voluptatem culpa commodi
            ratione officia ipsum.
            Quasi repellendus optio aliquid, cupiditate commodi facere. Architecto aperiam labore doloribus! Sapiente
            voluptatem culpa amet molestias. Sunt maiores vitae exercitationem pariatur, facilis hic in maxime deleniti
            quia cum veritatis consequatur!
            Reiciendis sit qui, assumenda, adipisci illo provident officia unde libero quae ab quia! Deserunt earum
            provident sequi non rerum molestias dolores incidunt, perspiciatis nesciunt unde quaerat fugiat officia
            saepe corporis?
            Quae atque dolores, laboriosam soluta dolorem recusandae minus, sunt enim vero inventore commodi. Eveniet
            vero omnis libero magni voluptatum laborum iste, nostrum tempora aspernatur facere ea veniam quas, corporis
            earum?
            Ea ex nobis error obcaecati quis rerum iusto voluptatibus impedit quod nostrum. Quis, similique! Nemo magni
            ducimus voluptate esse deserunt, totam soluta veniam a blanditiis facere dolorum voluptatibus sapiente
            mollitia.
            Rem magnam ullam animi voluptatum quibusdam exercitationem ad eaque nemo minima, officiis culpa quo id dolor
            repudiandae ducimus facilis deleniti quisquam earum ab laboriosam laudantium enim ut minus quae. Voluptatem?
            Impedit ad ipsum corporis error officiis, praesentium quas optio deleniti aut velit quo dolore ullam animi
            quibusdam eius, perferendis veritatis harum est distinctio quam adipisci magnam molestias recusandae! Quasi,
            architecto.
            Quis atque, ullam suscipit commodi animi pariatur omnis distinctio maiores praesentium necessitatibus modi
            in voluptatem, saepe repudiandae repellat incidunt! Aspernatur vitae eaque eos magnam facere! Dolore dolorum
            soluta tenetur illo!
            Voluptatibus quas incidunt fugiat quo error recusandae iure odit, beatae minima voluptates eius laudantium!
            Commodi, enim minus officia aliquid cum quam illum quos a, omnis totam fugiat. Molestias, minima cum!
            Asperiores possimus corporis laudantium facilis nihil! Illo debitis quisquam cumque, et odio placeat
            eligendi quam, provident assumenda, accusamus sint beatae iusto ipsa omnis tempora minus delectus. Est
            quaerat laudantium adipisci.
        </p>
    </div>
    <!-- Text -->

    <!-- Side -->
    <!-- <div class=" h-full w-full">

        <div class="sticky top-28 space-y-3">

            <h1 class="font-bold text-center text-2xl my-5">Baca Juga</h1>

            <div class="card card-side bg-base-100 shadow-xl w-3/4 h-24 mx-auto">
                <figure>
                    <img src="https://daisyui.com/images/stock/photo-1635805737707-575885ab0820.jpg" alt="Movie"
                        class="w-32" />
                </figure>
                <div class="card-body">
                    <h2 class="card-title text-base">New movie is released!</h2>
                    <div class="card-actions justify-end">
                        <button class="btn btn-primary h-5">Watch</button>
                    </div>
                </div>
            </div>

            <div class="card card-side bg-base-100 shadow-xl w-3/4 h-24 mx-auto">
                <figure>
                    <img src="https://daisyui.com/images/stock/photo-1635805737707-575885ab0820.jpg" alt="Movie"
                        class="w-32" />
                </figure>
                <div class="card-body">
                    <h2 class="card-title">New movie is released!</h2>
                    <div class="card-actions justify-end">
                        <button class="btn btn-primary h-5">Watch</button>
                    </div>
                </div>
            </div>

            <div class="card card-side bg-base-100 shadow-xl w-3/4 h-24 mx-auto">
                <figure>
                    <img src="https://daisyui.com/images/stock/photo-1635805737707-575885ab0820.jpg" alt="Movie"
                        class="w-32" />
                </figure>
                <div class="card-body">
                    <h2 class="card-title">New movie is released!</h2>
                    <div class="card-actions justify-end">
                        <button class="btn btn-primary h-5">Watch</button>
                    </div>
                </div>
            </div>

            <div class="card card-side bg-base-100 shadow-xl w-3/4 h-24 mx-auto">
                <figure>
                    <img src="https://daisyui.com/images/stock/photo-1635805737707-575885ab0820.jpg" alt="Movie"
                        class="w-32" />
                </figure>
                <div class="card-body">
                    <h2 class="card-title">New movie is released!</h2>
                    <div class="card-actions justify-end">
                        <button class="btn btn-primary h-5">Watch</button>
                    </div>
                </div>
            </div>
        </div>

    </div> -->
    <!-- Side -->
</div>

<div class="divider my-5"></div>
<!-- Comments -->
<div class=" w-full my-10">
    <form action="">
        <label class="form-control">
            <div class="label">
                <span class="label-text font-bold text-xl">Komentar</span>
            </div>
            <textarea class="textarea textarea-bordered textarea-lg w-full h-32"
                placeholder="Tulis Komentar Anda Disini"></textarea>
        </label>
        <a href="" class="flex justify-end my-5">
            <button class="btn btn-outline btn-accent font-bold">
                <i class="fas fa-paper-plane"></i>
                <span>Kirim</span>
            </button>
        </a>
    </form>
</div>
<!-- Comments -->
<div class="divider my-5"></div>
<!-- Show Others Comments -->
<div class="w-full">
    <div class="chat chat-start">
        <div class="chat-image avatar">
            <div class="w-10 rounded-full border-2 place-content-center">
                <div class="text-center">
                    <i class="fas fa-user text-xl"></i>
                </div>
            </div>
        </div>
        <div class="chat-bubble">
            <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Vero nesciunt odio tempore
                exercitationem architecto fuga maiores optio, eaque veritatis deserunt omnis est pariatur quaerat
                perferendis, soluta rem praesentium tenetur laudantium.</p>
            <span class="flex justify-end items-end text-sm text-slate-300 pt-5">2024-09-12</span>
        </div>
    </div>
    <div class="chat chat-start">
        <div class="chat-image avatar">
            <div class="w-10 rounded-full border-2 place-content-center">
                <div class="text-center">
                    <i class="fas fa-user text-xl"></i>
                </div>
            </div>
        </div>
        <div class="chat-bubble">
            <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Vero nesciunt odio tempore
                exercitationem architecto fuga maiores optio, eaque veritatis deserunt omnis est pariatur quaerat
                perferendis, soluta rem praesentium tenetur laudantium.</p>
            <span class="flex justify-end items-end text-sm text-slate-300 pt-5">2024-09-12</span>
        </div>
    </div>
    <div class="chat chat-start">
        <div class="chat-image avatar">
            <div class="w-10 rounded-full border-2 place-content-center">
                <div class="text-center">
                    <i class="fas fa-user text-xl"></i>
                </div>
            </div>
        </div>
        <div class="chat-bubble">
            <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Vero nesciunt odio tempore
                exercitationem architecto fuga maiores optio, eaque veritatis deserunt omnis est pariatur quaerat
                perferendis, soluta rem praesentium tenetur laudantium.</p>
            <span class="flex justify-end items-end text-sm text-slate-300 pt-5">2024-09-12</span>
        </div>
    </div>
</div>
<!-- Show Others Comments -->

@endsection